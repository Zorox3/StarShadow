
<div>
<br /><br />

	{!if var="test" eq="4"}
		GLEICH
	{/if}
	<br />
	
	{!if var="test" neq="3"}
		NICHT GLEICH
	{/if}
	<br />
	
	{!if var="test" gt="3"}
		GRÖßer
	{/if}
	<br />
	
	{!if var="test" gte="3"}
		GRÖßer Gleich
	{/if}
	<br />
	
	{!if var="test" lt="5"}
		Kleiner 
	{/if}
	<br />
	
	{!if var="test" lte="6"}
		Kleiner Gleich
	{/if}
	<br />
	
	{!if var="test2" contains="$test3" contains="wie"}
		Contains "{!out name="c"}" in "{!out name="test2"}"
	{/if}
	

	
	
	


		
</div>