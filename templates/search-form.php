<h1>All Jobs</h1>


<form id="searchform" action="<?php  the_permalink() ?>" method="get">

        <input id="keyword" placeholder="keyword" class="inlineSearch" type="text" name="q"/>
        
        <div class="col-6" style="padding-right: 10px;">
        	<input type="text" placeholder="Position" id="position" name="position">
        </div>

        <div class="col-6">
        	<select name="categories" id="categorie">
        		<option value="">Select</option>
        		<option value="it">IT</option>
        		<option value="accounting">Accounting</option>
        	</select>
        </div>

        <div class="text-right">
        	<input class="inlineSubmit" id="searchsubmit" type="submit" alt="Search" value="Search" />
        </div>

</form>