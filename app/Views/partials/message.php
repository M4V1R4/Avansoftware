<?php
    if (isset($message)) {
        echo "<div class=\"row\">";
        echo "<div class=\"col-md-6\">";

        if ($message->isCloseButton()){
            //echo "<div class=\"".$message->getLevel()."\" role=\"alert\">";
            echo "<div class=\"".$message->getLevel()." alert-dismissible fade show\" role=\"alert\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">";
            echo "<span aria-hidden=\"true\">&times;</span>";
            echo "</button>";
        }
        else
            echo "<div class=\"".$message->getLevel()." alert-dismissible fade show\" role=\"alert\">";

        if (!is_null($message->getTitle()))
            echo "<h4 class=\"alert-heading\">".$message->getTitle()."</h4>";
        echo "<p>".$message->getMessage()."</p>";

        if (!is_null($message->getExtraMessage()))
            echo "<hr><p>".$message->getExtraMessage()."</p>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }