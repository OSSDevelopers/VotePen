<template>
	<div class="sidebar-right user-select theme-gray">
		<div class="padding-1"
		     @keyup.enter="logMeIn">
			<el-form label-position="top"
			         label-width="10px">
				<google-login-button size="mini"></google-login-button>

				<div class="align-center margin-top-bottom-1">
					<strong>Or</strong>
				</div>

				<div class="margin-bottom-half">
					<el-input placeholder="Username or email address..."
					          name="username"
					          v-model="login.username"
					          required
					          size="mini"
					          autocorrect="off"
					          autocapitalize="off"
					          spellcheck="false"></el-input>
				</div>

				<div class="margin-bottom-half">
					<el-input placeholder="Password..."
					          name="password"
					          v-model="login.password"
					          required
					          size="mini"
					          type="password"
					          autocorrect="off"
					          autocapitalize="off"
					          spellcheck="false"></el-input>
				</div>

				<div class="margin-bottom-half">
					<el-alert v-for="e in login.errors.username"
					          :title="e"
					          type="error"
					          show-icon
					          :closable="false"
					          :key="e"></el-alert>
					
					<el-alert v-for="e in login.errors.email"
					          :title="e"
					          type="error"
					          show-icon
					          :closable="false"
					          :key="e"></el-alert>

					<el-alert v-for="e in login.errors.password"
					          :title="e"
					          type="error"
					          show-icon
					          :closable="false"
					          :key="e"></el-alert>
				</div>

				<div class="margin-bottom-1">
					<el-checkbox v-model="login.remember"
					             size="mini">
						Remember me
					</el-checkbox>
				</div>

				<div class="flex-space">
					<el-button round size="mini"
					           @click="logMeIn"
					           :loading="login.loading"
					           :disabled="!login.username.trim() || !login.password.trim()"
					           type="success">
						Login
					</el-button>

					<a class="el-button el-button--text el-button--mini"
						href="/password/reset"
					>
						Forgotten password
					</a>
				</div>
			</el-form>
		</div>

		<hr class="thik-light-hr">

		<div class="sidebar-offer-wrapper bounceIn animated">
			<h3>New to VotePen?</h3>

			<p>
				By having a VotePen account, you can subscribe, vote, and comment on all your favorite channel content. Sign up in just seconds.
			</p>

			<el-button round type="primary"
			           size="mini"
					   @click="Store.modals.authintication.show = true"
			           class="full-width">
				Sign up
			</el-button>
		</div>

		<hr class="thik-light-hr">

		<ul class="sidebar-copyright">
			<li>&copy; 2018 VotePen</li>
			<li>
				<router-link to="/about">About</router-link>
			</li>
			<li>
				<a href="https://help.votepen.com/"
				   target="_blank">Help Center</a>
			</li>
			<li>
				<router-link to="/tos">Terms</router-link>
			</li>
			<li>
				<a href="https://blog.votepen.com"
				   target="_blank">Blog</a>
			</li>
			<li>
				<router-link to="/privacy-policy">Privacy Policy</router-link>
			</li>
			<li>
				<router-link to="/credits">Credits</router-link>
			</li>
			<li>
				<a href="mailto:press@votepen.com">Press</a>
			</li>
			<li class="item go-green"
					    @click="Store.modals.feedback.show = true">Contact</li>
		</ul>
	</div>
</template>

<script>
import Helpers from '../mixins/Helpers';
import GoogleLoginButton from '../components/GoogleLoginButton';

export default {
    mixins: [Helpers],

    components: { GoogleLoginButton },

    data() {
        return {
            login: {
                username: '',
                password: '',
                remember: true,
                loading: false,
                errors: []
            }
        };
    },

    methods: {
        logMeIn() {
            this.login.loading = true;
            this.login.errors = [];

            axios
                .post('/login', {
                    username: this.login.username,
                    password: this.login.password,
                    remember: this.login.remember
                })
                .then((response) => {
                    this.login.loading = false;
                    Vue.clearLS();
                    location.reload();
                })
                .catch((error) => {
                    this.login.errors = error.response.data.errors;
                    this.login.loading = false;
                });
        }
    }
};
</script>
