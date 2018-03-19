[globalVar = TSFE : beUserLogin > 0]
[else]
  page.footerData {
    10 = TEXT
    10.value (
      <!-- Global site tag (gtag.js) - Google Analytics -->
			<script async src="https://www.googletagmanager.com/gtag/js?id=UA-115980971-1"></script>
			<script>
			  window.dataLayer = window.dataLayer || [];
			  function gtag(){dataLayer.push(arguments);}
			  gtag('js', new Date());
			
			  gtag('config', 'UA-115980971-1');
			</script>
    )
  }
[end]