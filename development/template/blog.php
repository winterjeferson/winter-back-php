<h1 class="page-title">
    <?php echo $frameworkTranslation['template']['blog']; ?>
</h1>
<div class="row">
    <div class="col-es-12">
        <div class="padding-re">
            <nav class="menu menu-vertical">
                <ul>
                    <?php
                    $objFrameworkTranslation = new FrameworkTranslation();
                    $objFrameworkBlog = new FrameworkBlog();
                    $query = $objFrameworkBlog->getPostList();
                    $string = '';

                    foreach ($query as $key => $value) {
                        $string .= '<li>';
                        $string .= '    <a href="' . $objFrameworkTranslation->getLanguage() . '/post/' . $value['id'] . '/' . $value['url'] . '" class="link link-blue">';
                        $string .= $value['title'];
                        $string .= '    </a>';
                        $string .= '</li>';
                    }

                    echo $string;
                    ?>
                </ul>
            </nav>
        </div>
    </div>
</div>