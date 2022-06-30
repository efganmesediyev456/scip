<template>
    <div class="d-flex">
        <nav class="mh-100 text-white col-md-2">
            <div class="logo d-flex align-items-center">
                <h5 class="text-center mb-0 text-uppercase fw-bold">{{ appName }}</h5>
            </div>
            <div class="my-3">
                <ul class="p-0">
                    <li>
                        <router-link :to="{'name': 'dashboard'}"><i class="bi bi-menu-button-wide-fill"></i>
                            {{ $t('dashboard') }}
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{'name': 'pages'}"><i class="bi bi-bar-chart-steps"></i>
                            {{ $t('pages') }}
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{'name': 'contact'}"><i class="bi bi-bar-chart-steps"></i>
                            {{ $t('Contact') }}
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{'name': 'agriculture_projects'}"><i class="bi bi-bar-chart-steps"></i>
                            {{ $t('Agricultural_projects') }}
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{'name': 'industrial_projects'}"><i class="bi bi-bar-chart-steps"></i>
                            {{ $t('Industrial_projects') }}
                        </router-link>
                    </li>
                    <li v-if="$store.getters['post/types'].filter(t=>t.hasOwnProperty('icon'))" class="divider">{{ $t('posts') }}</li>
                    <li v-for="postType in $store.getters['post/types'].filter(t=>t.hasOwnProperty('icon'))" :key="postType.value">
                        <router-link :to="{name: 'post-list', params: {postType: postType.value}}">
                            <i class="bi" :class="postType.icon"></i>
                            {{ $t(postType.name) }}
                        </router-link>
                    </li>
                    <li class="divider">{{ $t('system') }}</li>
                    <li>
                        <router-link :to="{'name': 'admin-users'}"><i class="bi bi-person-lines-fill"></i>
                            {{ $t('adminUsers') }}
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{'name': 'field-list'}"><i class="bi bi-card-list"></i>
                            {{ $t('fieldGroups') }}
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{'name': 'settings-list'}"><i class="bi bi-code-square"></i>
                            {{ $t('settings') }}
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{'name': 'redirect-list'}"><i class="bi bi-link-45deg"></i>
                            {{ $t('redirects') }}
                        </router-link>
                    </li>
                </ul>
            </div>
        </nav>
        <main class="position-relative col-md-10">
            <header class="w-100 d-flex justify-content-between align-items-center">
                <h1 class="fw-bold m-0"></h1>
                <div class="profile d-flex justify-content-end align-items-center">
                    <button type="button" class="btn btn-toolbar position-relative px-0" data-bs-toggle="dropdown"
                            aria-expanded="false" data-bs-offset="10,20">
                        <span class="d-flex align-items-center justify-content-end">
                          <span class="d-block text-black text-end me-2">
                            {{ $store.getters['admin/user'] ? $store.getters['admin/user'].name : '' }}
                            <small class="text-muted d-block">
                                {{ $store.getters['admin/user'] ? $store.getters['admin/user'].position : '' }}
                            </small>
                          </span>
                          <img v-if="$store.getters['admin/user']" :src="$store.getters['admin/user'].picture" alt="">
                        </span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li>
                            <router-link class="dropdown-item" :to="{name: 'account-settings'}">
                                {{ $t('accountSettings') }}
                            </router-link>
                        </li>
                        <li @click="setLang('az')" v-if="$i18n.locale !== 'az'">
                            <a class="dropdown-item"><i class="bi bi-globe2 me-2"></i> {{ $t('switchToAz') }}</a>
                        </li>
                        <li @click="setLang('en')" v-if="$i18n.locale !== 'en'">
                            <a class="dropdown-item"><i class="bi bi-globe2 me-2"></i> {{ $t('switchToEng') }}</a>
                        </li>
                        <li @click="setLang('ru')" v-if="$i18n.locale !== 'ru'">
                            <a class="dropdown-item"><i class="bi bi-globe2 me-2"></i> {{ $t('switchToRu') }}</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item-text text-danger text-decoration-none" href="#"
                               @click.prevent="logout">
                                <i class="bi bi-box-arrow-left me-1"/> {{ $t('logout') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </header>
            <div class="content">
                <router-view/>
            </div>
            <footer class="w-100 position-absolute bottom-0 d-flex justify-content-between">
                <span>
                  <span class="text-muted">2022 ©</span>
                  <a href="https://safaroff.com" target="_blank" class="text-black text-decoration-none">SAFAROFF CA</a>
                </span>
                <span>
                  <a href="https://safaroff.com" target="_blank"
                     class="text-black text-decoration-none">{{ $t('needHelp') }}</a>
                </span>
            </footer>
        </main>
    </div>
</template>

<script>
export default {
    name: 'Nav',


    data() {
        return {
            appName: process.env.MIX_APP_NAME,
        }
    },

    methods: {
        logout() {
            this.$store.dispatch('admin/logout')

            window.location = '/'+process.env.MIX_ADMIN_PREFIX
        },

        setLang(language) {
            localStorage.setItem('language', language)
            this.$i18n.locale = language
            window.location.reload()
        }
    },
}
</script>

<style lang="scss" scoped>

nav {
    min-height: 100vh;
    overflow: scroll;
    background-color: #1e1e2d;

    .logo {
        background-color: #1a1a27;
        height: 65px;
        padding: 0 25px;
    }

    ul {
        li {
            list-style: none;
            cursor: pointer;
            position: relative;

            a {
                display: block;
                padding: 0.75rem 25px;
                color: #9899ac;
                text-decoration: none;

                i {
                    margin-right: 10px;
                    font-size: 16px;
                    position: relative;
                    top: 2px;
                }

                &.router-link-exact-active {
                    background-color: #1b1b28;
                    color: white;

                    i {
                        color: #009ef7
                    }
                }
            }

            &:not(.divider):hover {
                background-color: #1b1b28;

                a {
                    color: white;
                }

                i {
                    color: #009ef7
                }
            }

            &.divider {
                padding: 2rem 25px 0.75rem;
                color: #4c4e6f;
                text-transform: uppercase;
                cursor: default;
            }
        }
    }
}

main {
    flex: 1 auto;

    header {
        padding: 12.5px 43px;
        max-height: 65px;
        box-shadow: 0 0 5px 0 rgb(41 41 41 / 25%);
        background-color: white;

        .profile {
            img:not(.locale) {
                width: 50px;
                height: 50px;
                object-fit: cover;
                border: 1px solid transparent;
                border-radius: 50%;
            }

            .btn-check:focus + .btn, .btn:focus {
                box-shadow: none;
            }

            .dropdown-menu {
                box-shadow: 0 0 50px 0 rgb(82 63 105 / 15%);

                p {
                    padding: 0.25rem 1rem;
                }
            }
        }
    }

    footer {
        font-size: 13px;
        padding: 23px 43px;
        max-height: 65px;
        box-shadow: 0 0 5px 0 rgb(41 41 41 / 25%);
        background-color: white;
    }

    .content {
        padding: 15px;
        margin-bottom: 65px;
    }
}
</style>
