<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tab using JavaScript</title>
	<style>
		.tabs
		{
			display: flex;
		}
		.tabs div
		{
			padding: 5px;
			box-sizing: border-box;
		}
		.contents div
		{
			display: none;
		}
		.contents div:first-child
		{
			display: block;
		}
		.active
		{
			border-left: 2px solid lightblue;
			border-top: 2px solid lightblue;
			border-right: 2px solid lightblue;
		}
	</style>
</head>
<body>

<div class="tabs">
	<div>Tab 1</div>
	<div>Tab 2</div>
	<div>Tab 3</div>
</div>

<div class="contents">
	<div>Tab 1 content: Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, culpa!</div>
	<div>Tab 2 content: Lorem ipsum dolor sit, amet consectetur adipisicing, elit. Sequi, officiis.</div>
	<div>Tab 3 content: Lorem ipsum dolor, sit amet consectetur, adipisicing elit. Numquam, cupiditate.</div>
</div>

<script>
	document.querySelector( '.tabs' ).querySelector( 'div' ).classList.add( 'active' );
	for ( let i = 0; i < document.querySelector( '.tabs' ).querySelectorAll( 'div' ).length; i++ )
	{
		// Add Data Attributes
		document.querySelector( '.tabs' ).querySelectorAll( 'div' )[ i ].dataset.num = i;
		document.querySelector( '.contents' ).querySelectorAll( 'div' )[ i ].dataset.num = i;

		// Add events
		document.querySelector( '.tabs' ).querySelectorAll( 'div' )[ i ].onclick = function()
		{
			// Remove active class
			this.classList.add( 'active' );
			// Hide everything except that num valued element
			for ( let j = 0; j < document.querySelector( '.contents' ).querySelectorAll( 'div' ).length; j++ )
			{
				if ( j == this.dataset.num )
				{
					document.querySelector( '.contents' ).querySelectorAll( 'div' )[ j ].style.display = 'block';
				}
				else
				{
					// Remove active class
					document.querySelector( '.tabs' ).querySelectorAll( 'div' )[ j ].classList.remove( 'active' );
					document.querySelector( '.contents' ).querySelectorAll( 'div' )[ j ].style.display = 'none';
				}
			}
		}
	}
</script>

</body>
</html>
