<footer class="Footer" id="footer">
	<div><a href="politicacookies">Política de Cookies</a></div>
	<div><a href="politicaprivacidad">Política de Privacidad</a></div>
	<div><a href="avisolegal">Aviso Legal</a></div>
	<div><p> Copyright © 2019 art-deco.site </p></div>
	<div class="socialIcon">
		<a href="<?php echo SOCIALFB; ?>" rel="nofollow" target="_blank">
			<img src="./img/icon-facebook.png" alt="icono de Facebook"></a>
		<a href="<?php echo SOCIALIG; ?>" rel="nofollow" target="_blank">
			<img src="./img/icon-instagram.png" alt="icono de Instagram"></a>
	</div>
</footer>
<?php include_once './vista/modulos/menu.php'; ?>
<script type="application/ld+json">
  {
    "@context": "https://schema.org/",
    "@type": "WebSite",
    "name": "<?php echo COMPANY; ?>",
    "url": "<?php echo WEBPAGE; ?>",
     "sameAs" : [
     "<?php echo SOCIALFB; ?>",
     "<?php echo SOCIALIG; ?>"
    ],
    "potentialAction": {
      "@type": "SearchAction",
      "target": "<?php echo SERVERURL; ?>?q={search_term_string}",
      "query-input": "required name=search_term_string"
    }
  }
</script>