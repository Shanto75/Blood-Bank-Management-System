<?php
if($_GET){
    if(isset($_GET['insert'])){
        insert();
    }elseif(isset($_GET['select'])){
        select();
    }
}

    function select()
    {
       echo "The select function is called.";
    }
    function insert()
    {
       echo "The insert function is called.";
    }

?>.


<input type="submit" class="button" name="insert" value="insert" />
<input type="submit" class="button" name="select" value="select" />