<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tab using JavaScript</title>
	<style>
		.tabs span
		{
			padding: 5px;
			box-sizing: border-box;
		}
		.contents span
		{
			display: none;
		}
		.contents span:first-child
		{
			display: inline;
		}
		.active
		{
			border-left: 2px solid lightblue;
			border-top: 2px solid lightblue;
			border-right: 2px solid lightblue;
		}
		/* use border box */
	</style>
</head>
<body>

<div class="tabs">
	<span>Tab 1</span>
	<span>Tab 2</span>
	<span>Tab 3</span>
</div>

<div class="contents">
	<span>Tab 1 content: Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, culpa!</span>
	<span>Tab 2 content: Lorem ipsum dolor sit, amet consectetur adipisicing, elit. Sequi, officiis.</span>
	<span>Tab 3 content: Lorem ipsum dolor, sit amet consectetur, adipisicing elit. Numquam, cupiditate.</span>
</div>

<script>
	document.querySelector( '.tabs' ).querySelector( 'span' ).classList.add( 'active' );
	for ( let i = 0; i < document.querySelector( '.tabs' ).querySelectorAll( 'span' ).length; i++ )
	{
		// Add Data Attributes
		document.querySelector( '.tabs' ).querySelectorAll( 'span' )[ i ].dataset.num = i;
		document.querySelector( '.contents' ).querySelectorAll( 'span' )[ i ].dataset.num = i;

		// Add events
		document.querySelector( '.tabs' ).querySelectorAll( 'span' )[ i ].onclick = function()
		{
			// Remove active class
			this.classList.add( 'active' );
			// Hide everything except that num valued element
			for ( let j = 0; j < document.querySelector( '.contents' ).querySelectorAll( 'span' ).length; j++ )
			{
				if ( j == this.dataset.num )
				{
					document.querySelector( '.contents' ).querySelectorAll( 'span' )[ j ].style.display = 'inline';
				}
				else
				{
					// Remove active class
					document.querySelector( '.tabs' ).querySelectorAll( 'span' )[ j ].classList.remove( 'active' );
					document.querySelector( '.contents' ).querySelectorAll( 'span' )[ j ].style.display = 'none';
				}
			}
		}
	}
</script>

</body>
</html>
