<?php require __DIR__ . '/../inc/admin_header.php';
?>
<div class="container">

    <div class="card my-5 shadow-lg">
        <div class="card-header">
            <h1><?= esc($title) ?></h1>
        </div>
        <div class="card-body">


            <form action="/admin/?p=process-edit-service" enctype="multipart/form-data" method="post" novalidate>
                <input type="hidden" name="csrf_token" value="<?= csrf() ?>" />
                <input type="hidden" name="id" value="<?= $_REQUEST['id'] ?>" />
                <div class="row">
                    <div class="col-6 my-2">
                        <div class="form-group">
                            <label class="form-label" for="category">Category<span class="require-mark">*</span></label>
                            <select name="category" id="category" class="form-select">
                                <?php for ($i = 0; $i < count($categories); $i++) : ?>
                                    <option value=" <?= $categories[$i]['id'] ?>" <?php if (getAttrValue($post, $service, 'category') == $categories[$i]['id']) : ?>selected<?php endif; ?>><?= $categories[$i]['title'] ?></option>
                                <?php endfor; ?>
                            </select>
                            <span class="invalid-feedback d-block"> <?= esc($errors['category'][0] ?? '') ?> </span>
                        </div>
                    </div>
                    <div class="col-6 my-2">
                        <div class="form-group">
                            <label class="form-label" for="display">Display<span class="require-mark">*</span></label>
                            <select name="display" id="display" class="form-select">
                                <option value="all place" <?php if (getAttrValue($post, $service, 'display') == 'all place') : ?>selected<?php endif; ?>>All Place</option>
                                <option value="main page" <?php if (getAttrValue($post, $service, 'display') == 'main page') : ?>selected<?php endif; ?>>Main Page</option>
                                <option value="service page" <?php if (getAttrValue($post, $service, 'display') == 'service page') : ?>selected<?php endif; ?>>Service Page</option>
                                <option value="hide" <?php if (getAttrValue($post, $service, 'display') == 'hide') : ?>selected<?php endif; ?>>Hide</option>
                            </select>
                            <span class="invalid-feedback d-block"> <?= esc($errors['display'][0] ?? '') ?> </span>
                        </div>
                    </div>
                    <div class="col-12 my-2">
                        <div class="form-group">
                            <label class="form-label" for="title">Title<span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title" class="form-control" value="<?= esc_attr($post['title'] ?? $service['title']) ?>" />
                            <span class="invalid-feedback d-block"> <?= esc($errors['title'][0] ?? '') ?> </span>
                        </div>
                    </div>
                    <div class="col-12 my-2">
                        <div class="form-group">
                            <label class="form-label" for="description">Description<span class="text-danger">*</span></label>
                            <input type="text" name="description" id="description" class="form-control" value="<?= esc_attr($post['description'] ?? $service['description']) ?>" />
                            <span class="invalid-feedback d-block"> <?= esc($errors['description'][0] ?? '') ?> </span>
                        </div>
                    </div>
                    <div class="col-12 my-2">
                        <div class="form-group">
                            <label class="form-label" for="short_description">Short Description<span class="text-danger">*</span></label>
                            <input type="text" name="short_description" id="short_description" class="form-control" value="<?= esc_attr($post['short_description'] ?? $service['short_description']) ?>" />
                            <span class="invalid-feedback d-block"> <?= esc($errors['short_description'][0] ?? '') ?> </span>
                        </div>
                    </div>

                    <div class="col-4 my-2">
                        <div class="form-group">
                            <label class="form-label" for="price">Price<span class="text-danger">*</span></label>
                            <input type="text" name="price" id="price" class="form-control" value="<?= esc_attr($post['price'] ?? $service['price']) ?>" />
                            <span class="invalid-feedback d-block"> <?= esc($errors['price'][0] ?? '') ?> </span>
                        </div>
                    </div>
                    <div class="col-4 my-2">
                        <div class="form-group">
                            <label class="form-label" for="estimated_time">Estimated Time<span class="text-danger">*</span></label>
                            <input type="text" name="estimated_time" id="estimated_time" class="form-control" value="<?= esc_attr($post['estimated_time'] ?? $service['estimated_time']) ?>" />
                            <span class="invalid-feedback d-block"> <?= esc($errors['estimated_time'][0] ?? '') ?> </span>
                        </div>
                    </div>
                    <div class="col-4 my-2">
                        <div class="form-group">
                            <label class="form-label" for="no_of_staff_required">No. of Staff Required<span class="text-danger">*</span></label>
                            <input type="text" name="no_of_staff_required" id="no_of_staff_required" class="form-control" value="<?= esc_attr($post['no_of_staff_required'] ?? $service['no_of_staff_required']) ?>" />
                            <span class="invalid-feedback d-block"> <?= esc($errors['no_of_staff_required'][0] ?? '') ?> </span>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <?php if (getAttrValue($post, $service, 'image')) : ?>
                            <p>Image</p>
                            <p>
                                <img src="/images/service/<?= esc($service['image']) ?>" alt="<?= esc($service['title']) ?>" width="100" height="100">
                            </p>
                        <?php endif; ?>
                    </div>
                    <div class="col-12 input-group mb-3">
                        <input type="hidden" name="service_image" id="service_image" class="form-control" value="<?= $service['image'] ?? '' ?>" />
                        <input type="file" name="image" class="form-control" id="image">
                        <label class="input-group-text" for="image">Image</label>
                        <div class="invalid-feedback d-block"> <?= esc($errors['image'][0] ?? '') ?></div>
                    </div>
                    <div class="col-12 my-2">
                        <div class="form-group">
                            <label class="form-label" for="tag">Tag<span class="text-danger">*</span></label>
                            <input type="text" name="tag" id="tag" class="form-control" value="<?= esc_attr($post['tag'] ?? $service['tag']) ?>" />
                            <span class="invalid-feedback d-block"> <?= esc($errors['tag'][0] ?? '') ?> </span>
                        </div>
                    </div>

                </div>
                <div>
                    <input type="submit" value="Save" class="btn btn-outline-success m-1" />
                    <!-- <button @click="onCancel" class="btn btn-outline-danger m-1">Cancel</button> -->
                </div>
            </form>
        </div>
    </div>

</div>
<?php require __DIR__ . '/../inc/admin_footer.php'; ?>