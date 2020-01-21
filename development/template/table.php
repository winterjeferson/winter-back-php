{% from 'include/template_nunjucks.php' import arrSize, arrColor %}
<h1 class="page-title">
    <?php echo $frameworkTranslation['template']['table']; ?>
</h1>
<div class="row">
    {% for color in arrColor %}
    <div class="col-es-12 col-re-6 padding-re">
        <table class="table table-{{color}}">
            <thead>
                <tr>
                    <th>Phasellusa</th>
                    <th>Lorem</th>
                    <th>Pellentesaque</th>
                </tr>
            </thead>
            <tbody>
                {% for size in arrSize %}
                <tr>
                    <td>Phasellusa vel tincidunt urnad. </td>
                    <td>Lorem ipsum dolor sit amet, consecttur adipscing elit. Phasellusa vel tincidunt urnad. Pellentesaque urna loremd, interdum a metus a, pular fermentum urna.</td>
                    <td>Pellentesaque urna loremd, interdum a metus a, pular fermentum urna. </td>
                </tr>
                {% endfor %}
            </tbody>
        </table>
    </div>
    {% endfor %}
</div>