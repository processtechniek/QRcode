<!DOCTYPE html>
<html lang="en">

<head>
	<style>
		body {
			background: rgb(140, 214, 30);
		}
		
		[data-tab-info] {
			display: none;
		}
		
		.active[data-tab-info] {
			display: block;
		}
		
		.tab-content {
			font-size: 30px;
			font-family: sans-serif;
			font-weight: bold;
			color: rgb(82, 75, 75);
		}
		
		.tabs {
			font-size: 40px;
			color: rgb(255, 255, 255);
			display: flex;
			margin: 0;
		}
		
		.tabs span {
			background: rgb(28, 145, 38);
			padding: 10px;
			border: 1px solid rgb(255, 255, 255);
		}
		
		.tabs span:hover {
			background: rgb(29, 185, 112);
			cursor: pointer;
			color: black;
		}

		[data-tit-info] {
			display: none;
		}
		
		.active[data-tit-info] {
			display: block;
		}
		
		.tit-content {
			font-size: 30px;
			font-family: sans-serif;
			font-weight: bold;
			color: rgb(82, 75, 75);
		}
		
		.tits {
			font-size: 40px;
			color: rgb(255, 255, 255);
			display: flex;
			margin: 0;
		}
		
		.tits span {
			background: rgb(28, 145, 38);
			padding: 10px;
			border: 1px solid rgb(255, 255, 255);
		}
		
		.tits span:hover {
			background: rgb(29, 185, 112);
			cursor: pointer;
			color: black;
		}
	</style>
</head>

<body>
	<div class="tabs">
		<span data-tab-value="#tab_1">Algemeen</span>
		<span data-tab-value="#tab_2">Equipment</span>
	</div>

	<div class="tab-content">
	<div class="tabs__tab" id="tab_1" data-tab-info>
			<div class="tits">
				<span data-tit-value="#tit_1">Grondschema's</span>
				<span data-tit-value="#tit_2">P+I</span>
				<span data-tit-value="#tit_3">Niks</span>
			</div>
		</div>

		<div class="tabs__tab" id="tab_2" data-tab-info>
		<div class="tits">
				<span data-tit-value="#tit_1">Bestanden</span>
				<span data-tit-value="#tit_2">Tekeningen</span>
			</div>
		</div>

	<div class="tit-content">
		<div class="tits__tit" id="tit_1" data-tit-info>
			<p>Welcome to GeeksforGeek.</p>

		</div>
		<div class="tits__tit" id="tit_2" data-tit-info>
			<p>Hello Everyone.</p>

		</div>
		<div class="tits__tit" id="tit_3" data-tit-info>
			<p>Learn cool stuff.</p>

		</div>
	</div>
	<script type="text/javascript">
		const tabs = document.querySelectorAll('[data-tab-value]')
		const tabInfos = document.querySelectorAll('[data-tab-info]')

		tabs.forEach(tab => {
			tab.addEventListener('click', () => {
				const target = document
					.querySelector(tab.dataset.tabValue);

				tabInfos.forEach(tabInfo => {
					tabInfo.classList.remove('active')
				})
				target.classList.add('active');
			})
		})

		const tits = document.querySelectorAll('[data-tit-value]')
		const titInfos = document.querySelectorAll('[data-tit-info]')

		tits.forEach(tit => {
			tit.addEventListener('click', () => {
				const target = document
					.querySelector(tit.dataset.titValue);

				titInfos.forEach(titInfo => {
					titInfo.classList.remove('active')
				})
				target.classList.add('active');
			})
		})

	</script>
</body>

</html>
