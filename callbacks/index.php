<?

$topics = Wiki::find_all( array(
  'order'=>'path',
  'load'=>array('current_version')
));

