<div id="createQuoteForm"></div>

@push('vue_templates')
<script type="text/x-template" id="_createQuoteForm">
<form
ref="form"
role="form"
data-action-url="{{ lroute('quotes.store') }}"
novalidate
>
<div class="mb-3 row">
<label class="col-3 col-form-label" for="text">
{{ __('quote/create_page.form.text') }}
</label>

<div class="col-9">
<textarea
v-model="form.text"
id="text"
name="text"
:class="['form-control', {'is-invalid': 'text' in errors}]"
:aria-invalid="'text' in errors ? 'true' : null"
@input="'text' in errors && delete errors.text"
maxlength="5000"
required
/>

<div v-if="'text' in errors" class="invalid-feedback">
<strong>@{{ errors.text[0] }}</strong>
</div>
</div>
</div>

<div class="mb-3 row">
<div class="col-9 offset-3">
<button type="button" class="btn btn-primary" :disabled="submitting" @click="submit" ref="submit">
<template v-if="submitting">
<span class="spinner-border spinner-border-sm"></span>
<span class="visually-hidden" role="status">{{ __('common.please_wait') }}...</span>
</template>
<template v-else>
{{ __('quote/create_page.form.submit') }}
</template>
</button>
</div>
</div>
</form>

<div
v-if="alert !== null"
:class="['alert', alertType, 'alert-dismissible']"
role="alert"
aria-live="assertive"
aria-atomic="true"
>
<p ref="alert" style="margin: 0; white-space: pre-lines;">
<template v-if="alert.type === 'success'">
{{ __('quote/create_page.created') }}
</template>
<template v-else>
@{{ alert.message }}
</template>
</p>

<button type="button" class="btn-close" aria-label="{{ __('common.close') }}" @click="closeAlert"></button>
</div>
</script>
@endpush
