<div id="loginForm"></div>

@push('vue_templates')
<script type="text/x-template" id="_loginForm">
<form
ref="form"
role="form"
@submit.prevent="submit"
data-action-url="{{ lroute('login.handle') }}"
data-redirect-url="{{ lroute('home') }}"
novalidate
>
<div class="mb-3 row">
<label class="col-3 col-form-label" for="authEmail">
{{ __('login/login_page.form.email') }}
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
required
/>

<div v-if="'email' in errors" class="invalid-feedback">
<strong>@{{ errors.email[0] }}</strong>
</div>
</div>
</div>

<div class="mb-3 row">
<label class="col-3 col-form-label" for="authPassword">
{{ __('login/login_page.form.password') }}
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
<div class="col-6">
<div class="form-check">
<input
v-model="form.remember"
type="checkbox"
name="remember"
id="authRemember"
class="form-check-input"
/>

<label class="form-check-label" for="authRemember">
{{ __('login/login_page.form.remember') }}
</label>
</div>
</div>

<div class="col-6">
<button ref="submit" type="submit" class="btn btn-primary" :disabled="submitting">
<template v-if="submitting">
<span class="spinner-border spinner-border-sm"></span>
<span class="visually-hidden" role="status">{{ __('common.please_wait') }}...</span>
</template>
<template v-else>
{{ __('login/login_page.form.submit') }}
</template>
</button>
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
