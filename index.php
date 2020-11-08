<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tab using vanilla JavaScript</title>
	<style>
		.sstab .tabs
		{
			display: flex;
		}
		.sstab .tabs div
		{
			box-sizing: border-box;
			cursor: pointer;
			flex-grow: 1;
			text-align: center;
		}
		.sstab .contents div
		{
			display: none;
			animation: fadeEffect 1s;
		}
		.sstab .contents div:first-child
		{
			display: block;
		}
		.sstab .active
		{
			border-left: 1px solid lightgray;
			border-top: 1px solid lightgray;
			border-right: 1px solid lightgray;
			padding: 4px 4px 5px 4px ;
		}
		.sstab .inactive
		{
			border-bottom: 1px solid lightgray;
			padding: 5px 5px 4px 5px;
		}
		@keyframes fadeEffect
		{
			from { opacity: 0; }
			to { opacity: 1; }
		}
	</style>
</head>
<body>

<div class="sstab">
	<div class="tabs">
		<div>Tab 1</div>
		<div>Tab 2</div>
		<div>Tab 3</div>
	</div>

	<div class="contents">
		<div>Tab 1 content.</div>
		<div>Tab 2 content.</div>
		<div>Tab 3 content.</div>
	</div>
</div>

<div class="sstab">
	<div class="tabs">
		<div>Tab 1</div>
		<div>Tab 2</div>
		<div>Tab 3</div>
	</div>

	<div class="contents">
		<div>Tab 1 content</div>
		<div>Tab 2 content</div>
		<div>Tab 3 content</div>
	</div>
</div>

<script>
	let sstab = document.querySelectorAll( '.sstab' );
	// Add active and inactive classes
	for ( let i = 0; i < sstab.length; i++ )
	{
		// Add active class to first tab
		sstab[ i ].querySelector( '.tabs' ).querySelector( 'div' ).classList.add( 'active' );

		// Add inactive class to other tabs
		for ( let j = 1; j < sstab[ i ].querySelector( '.tabs' ).querySelectorAll( 'div' ).length; j++ )
		{
			sstab[ i ].querySelector( '.tabs' ).querySelectorAll( 'div' )[ j ].classList.add( 'inactive' );
		}

		// Add events to each tab
		for ( let j = 0; j < sstab[ i ].querySelector( '.tabs' ).querySelectorAll( 'div' ).length; j++ )
		{
			// Add Data Attributes
			sstab[ i ].querySelector( '.tabs' ).querySelectorAll( 'div' )[ j ].dataset.num = j;
			sstab[ i ].querySelector( '.contents' ).querySelectorAll( 'div' )[ j ].dataset.num = j;

			// Add events
			sstab[ i ].querySelector( '.tabs' ).querySelectorAll( 'div' )[ j ].onclick = function()
			{
				// Hide everything except that num valued element
				for ( let k = 0; k < this.parentElement.querySelectorAll( 'div' ).length; k++ )
				{
					if ( k == this.dataset.num )
					{
						this.classList.remove( 'inactive' );
						this.classList.add( 'active' );

						// Show the corresponding content
						this.parentElement.parentElement.querySelector( '.contents' ).querySelectorAll( 'div' )[ k ].style.display = 'block';
						// div	.tabs		.sstab
					}
					else
					{
						this.parentElement.querySelectorAll( 'div' )[ k ].classList.remove( 'active' );
						this.parentElement.querySelectorAll( 'div' )[ k ].classList.add( 'inactive' );
						// div	.tabs

						// Hide the corresponding content
						this.parentElement.parentElement.querySelector( '.contents' ).querySelectorAll( 'div' )[ k ].style.display = 'none';
					}
				}
			}
		}
	}
</script>

</body>
</html>
