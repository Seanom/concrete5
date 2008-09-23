<?
defined('C5_EXECUTE') or die(_("Access Denied."));
$bt = Loader::helper('concrete/interface');
?>
<h1><span>Themes</span></h1>
	<div class="ccm-dashboard-inner">
	
	
	<? if (isset($activate_confirm)) { ?>
	<strong>Are you sure you wish to activate this theme? Any custom theme selections across your site will be reset.</strong>
	<br/><br/>
	<?=$bt->button("Yes, activate this theme.", $activate_confirm, "left");?>
	or <a href="<?=$this->url('/dashboard/themes/')?>">Cancel</a>
	
	<div class="ccm-spacer">&nbsp;</div>
	
	<? } else { ?>
	
	<div style="margin:0px; padding:0px; width:100%; height:auto" >	
	<table border="0" cellspacing="0" cellpadding="0" id="ccm-template-list">
	<?
	if (count($tArray) == 0) { ?>
	<tr>
		<td colspan="5">No themes are available.</td>
	</tr>
	<? } else {
		foreach ($tArray as $t) { ?>
		<tr <? if ($siteTheme->getThemeID() == $t->getThemeID()) { ?> class="ccm-theme-active" <? } ?>>
			<td><?=$t->getThemeThumbnail()?></td>
			<td class="ccm-template-content">
			<h2><?=$t->getThemeName()?></h2>
			<?=$t->getThemeDescription()?>
			<br/><br/>
			<?=$bt->button("Activate", $this->url('/dashboard/themes','activate', $t->getThemeID()), "left");?>
			<?=$bt->button("Inspect", $this->url('/dashboard/themes/inspect', $t->getThemeID()), "left");?>
			
			<? if ($t->isUninstallable()) { ?>
				<?=$bt->button("Remove", $this->url('/dashboard/themes/inspect', 'remove', $t->getThemeID()), "left");?>
			<? } ?>
			</td>
		</tr>
		<? }
	} ?>
	<? 
	if (count($tArray2) > 0) { ?>
	<tr>
		<td colspan="2" class="header"><br/><h2>Themes Available to Install</h2></td>
	</tr>

	<? foreach ($tArray2 as $t) { ?>
		<tr>
			<td><?=$t->getThemeThumbnail()?></td>
			<td class="ccm-template-content">
			<h3><?=$t->getThemeName()?></h3>
			<?=$t->getThemeDescription()?>
			<br/><br/>
			<?=$bt->button("Install", $this->url('/dashboard/themes','install', $t->getThemeHandle()), "left");?>
			
		</tr>
		<? }
	} ?>
	</table>
	</div>

	<? } ?>
	
	</div>