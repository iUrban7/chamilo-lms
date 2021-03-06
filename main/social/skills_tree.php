<?php
/* For licensing terms, see /license.txt */

use Chamilo\CoreBundle\Framework\Container;

/**
 *  @package chamilo.admin
 */

$cidReset = true;
//require_once '../inc/global.inc.php';

$this_section = SECTION_MYPROFILE;

api_block_anonymous_users();

if (api_get_setting('skill.allow_skills_tool') != 'true') {
    api_not_allowed();
}

//Adds the JS needed to use the jqgrid
$htmlHeadXtra[] = api_get_jqgrid_js();
$htmlHeadXtra[] = api_get_js('components/jsplumb/dist/js/jsPlumb-2.0.4.js');
$htmlHeadXtra[] = api_get_js('components/jquery.ui.touch/jquery.ui.touch.js');
$htmlHeadXtra[] = api_get_js('js/skills.js');

$skill = new Skill();
$type = 'read'; //edit

$tree = $skill->get_skills_tree(api_get_user_id(), null, true);
$skill_visualizer = new SkillVisualizer($tree, $type);
$url = api_get_path(WEB_AJAX_PATH).'skill.ajax.php?1=1';
$tpl = Container::getTwig();

$tpl->addGlobal('url', $url);
$tpl->addGlobal('skill_visualizer', $skill_visualizer);

$content = $tpl->render('@template_style/skill/skill_tree_student.html.twig');
echo $content;