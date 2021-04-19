<section id="bannerAmazon" class="centrar separador1" style="height: 120px">
</section>

<script>
	let banner = ()=>{
		let bannerAmazon = document.getElementById('bannerAmazon')
		let iframe = document.createElement('iframe');
		let dimension = window.screen.width;

		if (dimension < 415){  
			iframe.setAttribute('src','https://rcm-eu.amazon-adsystem.com/e/cm?o=30&p=42&l=ez&f=ifr&linkID=c05935ab86335e9daa31c76baa6890f2&t=mlm198201-21&tracking_id=mlm198201-21');
			iframe.setAttribute('async','');
			iframe.setAttribute('width', 234)
			iframe.setAttribute('height', 60)
			iframe.setAttribute('frameborder', 0)
			bannerAmazon.appendChild(iframe)
		}
			else if(dimension > 415 && dimension < 1079){
				iframe.setAttribute('src','https://rcm-eu.amazon-adsystem.com/e/cm?o=30&p=13&l=ez&f=ifr&linkID=d9c39ce05bb0d9653ee12c90ed0ceede&t=mlm198201-21&tracking_id=mlm198201-21');
				iframe.setAttribute('async','');
				iframe.setAttribute('width', 468)
				iframe.setAttribute('height', 60)
				iframe.setAttribute('frameborder', 0)
				bannerAmazon.appendChild(iframe)
			}
				else if (dimension >= 1080){ 
					iframe.setAttribute('src','https://rcm-eu.amazon-adsystem.com/e/cm?o=30&p=48&l=ez&f=ifr&linkID=d1369dc3165a1af3c5aa5482e06d514b&t=mlm198201-21&tracking_id=mlm198201-21');
					iframe.setAttribute('async','');
					iframe.setAttribute('width', 728)
					iframe.setAttribute('height', 90)
					iframe.setAttribute('frameborder', 0)
					bannerAmazon.appendChild(iframe)
				}
	}
	banner()
</script>