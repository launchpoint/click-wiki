<?

map('content', 'university', 'index', 'view_wiki');
map('content', 'university/:path/edit', 'edit', 'edit_wiki_topic');
map('content', 'university/:path', 'view', 'view_wiki_topic');
map('content', 'university/:path/move/:direction', 'move', 'move_wiki_topic');
//map_raw('content', "/^{$app_routing_prefix}university\/(?!_edit)(?<path>.*)$/", 'view', 'view_wiki_topic');
//map_raw('content', "/^{$app_routing_prefix}university\/_edit\/(?<path>.*)$/", 'edit', 'edit_wiki_topic');

