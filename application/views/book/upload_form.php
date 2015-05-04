<?php if (empty($info)): ?>
	<form action="/book/up_submit" method="post" accept-charset="utf-8" enctype="multipart/form-data" onsubmit="return book_up(this);">
		<div class="up_book">
			<p><bookmark-label for="up_book_title"><input class="input" type="text" name="book_title" size="20" placeholder="书名" value=""></bookmark-label></p>
			<p><bookmark-label for="up_book_author"><input class="input" type="text" name="book_author" size="20" placeholder="作者" value=""></bookmark-label></p>
			<p><bookmark-label for="up_book_commend"></bookmark-label><input class="input" type="text" name="book_commend" size="20" placeholder="描述" value=""></p>
			<p><bookmark-label for="up_book_time"></bookmark-label><input class="input" type="text" name="book_time" size="20" placeholder="出版时间" value=""></p>
			<p>
				<input type="file" name="userfile" id="file">
				<input class="submit" type="submit" name="submit" value="发表">
			</p>
		</div>
	</form>
<?php elseif($info=='error'): ?>
	<form action="/book/up_submit" method="post" accept-charset="utf-8" enctype="multipart/form-data" onsubmit="return book_up(this);">
		<div class="up_book">
			<p><bookmark-label for="up_book_title"><input class="input" type="text" name="book_title" size="20" placeholder="书名"></bookmark-label></p>
			<p><bookmark-label for="up_book_author"><input class="input" type="text" name="book_author" size="20" placeholder="作者"></bookmark-label></p>
			<p><bookmark-label for="up_book_commend"></bookmark-label><input class="input" type="text" name="book_commend" size="20" placeholder="描述"></p>
			<p><bookmark-label for="up_book_time"></bookmark-label><input class="input" type="text" name="book_time" size="20" placeholder="出版时间"></p>
			<p>
				<input type="file" name="userfile" id="file">
				<input class="submit" type="submit" name="submit" value="发表">
			</p>
		</div>
	</form>
<?php elseif ($info=='ok'): ?>

<?php endif;?>
