<?php

require "lib.php";
$html = file_get_html("https://tctil.com/%E0%A6%95%E0%A6%AE%E0%A7%8D%E0%A6%AA%E0%A6%BF%E0%A6%89%E0%A6%9F%E0%A6%BE%E0%A6%B0-%E0%A6%B8%E0%A6%AE%E0%A7%8D%E0%A6%AA%E0%A6%B0%E0%A7%8D%E0%A6%95%E0%A6%BF%E0%A6%A4-mcq-%E0%A6%AA%E0%A7%8D%E0%A6%B0/");


$html->find('tbody', 0);

foreach($html->find('.table_row') as $data) {
	$x = $data->find('th', 0);
	echo $x->innertext ." -- ";
	$y = $data->find('td', 0);
	echo $y->innertext;
	echo '<br>';
}

/*
// উদাহরণস্বরূপ, নির্দিষ্ট একটি ক্লাসের এলিমেন্ট খুঁজে পাওয়া
foreach($html->find('.specific-class') as $element) {
    echo $element->plaintext . '<br>';  // এলিমেন্টের টেক্সট আউটপুট করবে
}

// উদাহরণ: নির্দিষ্ট ট্যাগ এবং এট্রিবিউট খোঁজা
//$meta_description = $html->find('meta[name=description]', 0)->content;
//echo "Meta Description: " . $meta_description;
*/

$html->clear();  // মেমোরি রিলিজ করতে হবে, বিশেষ করে বড় HTML পেজের জন্য
unset($html);

?>
