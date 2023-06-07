#!/bin/sh
echo "Enter the name of the block? [eg, center_image]"
read name

echo "<div class=\"my-2 my-sm-5\"></div>" > builder/_$name.php

# CSS
echo "#builder > section.$name {}" > src/scss/builder/_$name.scss
echo "@import \"builder/$name\";" >> src/scss/style.scss
