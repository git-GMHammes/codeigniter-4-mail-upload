<div class="container">
    &nbsp;
</div>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Formulário para Upload</h5>
        </div>
        <div class="card-body">
            <?= form_open_multipart('upload/api/send', 'id="uploadForm" class="was-validated"'); ?>
            <div class="mb-3">
                <label for="validationTextarea" class="form-label">Textarea</label>
                <textarea class="form-control is-invalid" id="validationTextarea" name="validationTextarea" placeholder="Required example textarea" required></textarea>
                <div class="invalid-feedback">
                    Please enter a message in the textarea.
                </div>
            </div>

            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="validationFormCheck1" name="validationFormCheck1" required>
                <label class="form-check-label" for="validationFormCheck1">Check this checkbox</label>
                <div class="invalid-feedback">Example invalid feedback text</div>
            </div>

            <div class="form-check">
                <input type="radio" class="form-check-input" id="validationFormCheck2" name="radio-stacked" required>
                <label class="form-check-label" for="validationFormCheck2">Toggle this radio</label>
            </div>
            <div class="form-check mb-3">
                <input type="radio" class="form-check-input" id="validationFormCheck3" name="radio-stacked" required>
                <label class="form-check-label" for="validationFormCheck3">Or toggle this other radio</label>
                <div class="invalid-feedback">More example invalid feedback text</div>
            </div>

            <div class="mb-3">
                <select class="form-select" required aria-label="select example" name="mySelect" >
                    <option value="">Open this select menu</option>
                    <option value="One">One</option>
                    <option value="Two">Two</option>
                    <option value="Three">Three</option>
                </select>
                <div class="invalid-feedback">Example invalid select feedback</div>
            </div>

            <div class="mb-3">
                <input type="file" class="form-control" aria-label="file example" name="myFile" id="myFile" required>
                <div class="invalid-feedback">Example invalid form file feedback</div>
            </div>

            <div class="mb-3">
                <button class="btn btn-primary" type="submit" disabled>Submit form</button>
                <button class="btn btn-primary" type="submit">Enviar</button>
            </div>
            <?= form_close("&nbsp;"); ?>
        </div>
        <div class="card-footer text-right">
            <a href="#" class="btn btn-primary">Botão</a>
        </div>
    </div>
</div>
<div class="container">
    &nbsp;
</div>