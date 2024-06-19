

<?php if (session()->has("errors")): ?>

    <?php if (is_array(session()->get("errors"))): ?>
        <?php foreach (session()->get("errors") as $key => $value): ?>
            <div class="toast bg-warning fade show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="mr-auto">UYARI</strong>
                    <small>Subtitle</small>
                    <button data-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="toast-body"><?= $value ?></div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="toast bg-warning fade show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="mr-auto">UYARI</strong>
                <small>Subtitle</small>
                <button data-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="toast-body"><?= session()->get("errors") ?></div>
        </div>
    <?php endif; ?>
<?php endif; ?>

<?php if (session()->has("success")): ?>
    <?php if (is_array(session()->get("success"))): ?>
        <?php foreach (session()->get("success") as $key => $value): ?>
            <div class="toast bg-success fade show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="mr-auto">KAYIT BAŞARILI</strong>
                    <small>Subtitle</small>
                    <button data-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="toast-body"><?= $value ?></div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="toast bg-success fade show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="mr-auto">KAYIT BAŞARILI</strong>
                <small>Subtitle</small>
                <button data-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="toast-body"><?= session()->get("success") ?></div>
        </div>
    <?php endif; ?>
<?php endif; ?>
