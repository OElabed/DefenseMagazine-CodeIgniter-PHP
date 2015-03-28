<div style="width: 420px;background-color: #FFFFFF;">
<script src="<?php echo base_url(); ?>js/nicEdit.js" type="text/javascript"></script>
<script type="text/javascript">
bkLib.onDomLoaded(function() {
	new nicEditor({	maxHeight : 150,
					iconsPath : 'http://localhost/monprojet/img/nicEditorIcons.gif',
					buttonList : ['fontSize','fontFamily','fontFormat','bold','italic','underline','strikethrough','subscript','superscript','html','hr','bgcolor','forecolor','removeformat','link']
				   }).panelInstance('sommaire');
});
</script>

<textarea  name="sommaire" style="height: 150px;" cols="50" id="sommaire"><?php echo $produit_tr['sommaire_produit'];?></textarea>
</div>