<?php 

$name = $model->group->name;
$label = $model->label ? $model->label->group->name : null;
$label = $model->label ? $model->label->group->name : null;
$website = $model->group->website_url;							// TODO: some smarts to put consistent url format in the website_url db field
$about = $model->group->about;
$members = $model->group->members;

$members_links = [];
foreach($members as $member) {
	$members_links[] = CHtml::link($member->fullName, array('member/view', 'id'=>$member->id));
}
$members_str = implode(', ', $members_links);

?>

<div class="band_summary">
	<div class="image">
		<img width="120" height="100" src="<?php echo $model->group->profile_pic_url ?>" width="250" height="250"/>
	</div>
	<div class="content">
		<h1><?php echo $name; ?></h1>
		<h3>(<?php echo is_null($label) ? "unsigned" : $label; ?>)</h3>
		<a href="http://<?php echo $website; ?>"><?php echo $website; ?></a>
		<p><?php echo $about; ?></p>
	</div>
	<div class="members">
		<h3>Members</h3>
		<p><?php echo $members_str; ?></p>
	</div>
	<div class="clear"></div>
</div>
