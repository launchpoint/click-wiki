<?

$topics = Wiki::find_all( array(
  'order'=>'path',
  'load'=>array('current_version')
));

if (!isset($params['path'])) $params['path'] = 'home';
$article = Wiki::find_by_path($params['path']);

if ($params['path']=='')
{
  $parts = array();
} else {
  $parts = split('\|', $params['path']);
}
for($i=0;$i<count($parts);$i++)
{
  $parts[$i] = urldecode($parts[$i]);
}
$parts_path = array();
$links = array(
  link_to('Main', view_wiki_url())
);
for($i=0;$i<count($parts)-1;$i++)
{
  $part_path[] = $parts[$i];
  $links[] = link_to(ucwords(humanize($parts[$i])), view_wiki_topic_url(join('|', $part_path)));
}
if (count($parts)>0) $links[] = ucwords(humanize($parts[count($parts)-1]));
