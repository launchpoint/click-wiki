<?

require_authenticated();

if(!$current_user->has_access('wiki_editor'))
{
  flash_next("You do not have permission to edit this page.");
  redirect_to(view_wiki_topic_url($params['path']));
}

if (!isset($params['path'])) $params['path'] = 'home';

$wiki = Wiki::find_or_new_by( array(
  'conditions'=>array('path = ?', $params['path']),
  'attributes'=>array(
    'path'=>urldecode($params['path'])
  )
));

if ($wiki && $wiki->current_version)
{
  $version = $wiki->current_version;
  $version->is_new=true;
} else {
  $version = WikiVersion::new_model_instance( array(
    'attributes'=>array(
      'author_id'=>$current_user->id
    )
  ));
}

$parts = split("\\|", $params['path']);
for($i=0;$i<count($parts);$i++)
{
  $parts[$i] = urldecode($parts[$i]);
}

if($version->is_new)
{
  $version->title = $parts[count($parts)-1];
}

$parts_path = array();
$links = array(
  link_to('Main', view_wiki_url())
);
for($i=0;$i<count($parts)-1;$i++)
{
  $part_path[] = $parts[$i];
  $links[] = link_to(ucwords(humanize($parts[$i])), view_wiki_topic_url(join('\\|', $part_path)));
}
if (count($parts)>0) $links[] = ucwords(humanize($parts[count($parts)-1]));

if (is_postback())
{
  $version->update_attributes($params['wiki']['wiki_version']);
  if ($version->is_valid)
  {
    $wiki->current_version_id = $version->id;
    $wiki->update_attributes($params['wiki']);
    flash_next("Wiki article updated.");
    redirect_to(view_wiki_topic_url($params['wiki']['path']));
  }
}