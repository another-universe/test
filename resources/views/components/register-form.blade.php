<div id="registerForm"></div>

@push('vue_templates')
<script type="text/x-template" id="_registerForm">
<form
ref="form"
role="form"
@submit.prevent="submit"
data-action-url="{{ lroute('register.handle') }}"
data-redirect-url="{{ lroute('home') }}"
novalidate
>
<div class="mb-3 row">
<label class="col-3 col-form-label" for="authEmail">
{{ __('register/register_page.form.email') }}
</label>

<div class="col-9">
<input
v-model="form.email"
type="email"
name="email"
id="authEmail"
:class="['form-control', {'is-invalid': 'email' in errors}]"
:aria-invalid="'email' in errors ? 'true' : null"
@input="'email' in errors && delete errors.email"
maxlength="255"
required
/>

<div v-if="'email' in errors" class="invalid-feedback">
<strong>@{{ errors.email[0] }}</strong>
</div>
</div>
</div>

<div class="mb-3 row">
<label class="col-3 col-form-label" for="authPassword">
{{ __('register/register_page.form.password') }}
</label>

<div class="col-9">
<div class="input-group">
<input
v-model="form.password"
:type="showPassword ? 'text' : 'password'"
name="password"
id="authPassword"
:class="['form-control', {'is-invalid': 'password' in errors}]"
:aria-invalid="'password' in errors ? 'true' : null"
@input="'password' in errors && delete errors.password"
maxlength="255"
required
/>

<button type="button" class="btn btn-outline-secondary" @click="showPassword = !showPassword">
<template v-if="showPassword">
{{ __('common.hide_password') }}
</template>
<template v-else>
{{ __('common.show_password') }}
</template>
</button>

<div v-if="'password' in errors" class="invalid-feedback">
<strong>@{{ errors.password[0] }}</strong>
</div>
</div>
</div>
</div>

<div class="mb-2 row">
<div class="col-9 offset-3">
<div class="d-flex flex-row justify-content-between">
<button ref="submit" type="submit" class="btn btn-primary" :disabled="submitting">
<template v-if="submitting">
<span class="spinner-border spinner-border-sm"></span>
<span class="visually-hidden" role="status">{{ __('common.please_wait') }}...</span>
</template>
<template v-else>
{{ __('register/register_page.form.submit') }}
</template>
</button>

<a href="{{ lroute('login') }}" class="btn btn-link">
{{ __('register/register_page.form.have_account') }}?
</a>
</div>
</div>
</div>
</form>

<div
v-if="alert !== null"
class="alert alert-danger alert-dismissible"
role="alert"
aria-live="assertive"
aria-atomic="true"
>
<p ref="alert" style="margin: 0; white-space: pre-lines;">
@{{ alert }}
</p>

<button type="button" class="btn-close" aria-label="{{ __('common.close') }}" @click="closeAlert"></button>
</div>
</script>
@endpush
