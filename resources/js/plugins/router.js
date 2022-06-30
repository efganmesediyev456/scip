import Vue from 'vue'
import VueRouter from 'vue-router'
import {store} from '../app'

import Login from '../pages/Login'
import Dashboard from '../pages/Dashboard'
import NotFound from '../pages/NotFound'
import AccountSettings from '../pages/AccountSettings'
import AdminUsersList from '../pages/admin-users/list'
import AdminUsersCreate from '../pages/admin-users/create'
import AdminUsersEdit from '../pages/admin-users/edit'
import FieldList from '../pages/field/list'
import FieldCreate from '../pages/field/create'
import FieldEdit from '../pages/field/edit'
import FieldValueList from '../pages/field/value/list'
import FieldValueCreate from '../pages/field/value/create'
import FieldValueEdit from '../pages/field/value/edit'
import PostList from '../pages/post/list'
import PostCreate from '../pages/post/create'
import PostEdit from '../pages/post/edit'
import PageList from '../pages/pages/list'
import PageCreate from '../pages/pages/create'
import PageEdit from '../pages/pages/edit'
import SettingsList from '../pages/settings/list'
import SettingsEdit from '../pages/settings/edit'
import RedirectList from '../pages/redirect/list'
import RedirectCreate from '../pages/redirect/create'

import auth from '../middleware/auth'
import guest from '../middleware/guest'
import AccountEdit from "../pages/AccountEdit";

import Contact from "../pages/contact/list";
import Industrial_projects from "../pages/industrial_projects/list";
import Agriculture_projects from "../pages/agricultural_projects/list";

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: ('/' + process.env.MIX_ADMIN_PREFIX + '/').replace(/\/{2}/g, "/"),
            name: 'dashboard',
            component: Dashboard,
            meta: {
                middleware: auth,
                title: "Dashboard"
            },
        },
        {
            path: ('/' + process.env.MIX_ADMIN_PREFIX + '/login').replace(/\/{2}/g, "/"),
            name: 'login',
            component: Login,
            meta: {
                middleware: guest,
                title: "Login",
                hideNav: true
            }
        },
        {
            path: ('/' + process.env.MIX_ADMIN_PREFIX + '/account/settings').replace(/\/{2}/g, "/"),
            name: 'account-settings',
            component: AccountSettings,
            meta: {
                middleware: auth,
                title: "Account settings"
            },
        },
        {
            path: ('/' + process.env.MIX_ADMIN_PREFIX + '/contact').replace(/\/{2}/g, "/"),
            name: 'contact',
            component: Contact,
            meta: {
                middleware: auth,
                title: "Account contact"
            },
        },
        {
            path: ('/' + process.env.MIX_ADMIN_PREFIX + '/industrial_projects').replace(/\/{2}/g, "/"),
            name: 'industrial_projects',
            component: Industrial_projects,
            meta: {
                middleware: auth,
                title: "Account industrial_projects"
            },
        },
        {
            path: ('/' + process.env.MIX_ADMIN_PREFIX + '/agriculture_projects').replace(/\/{2}/g, "/"),
            name: 'agriculture_projects',
            component: Agriculture_projects,
            meta: {
                middleware: auth,
                title: "Account agriculture_projects"
            },
        },
        {
            path: ('/' + process.env.MIX_ADMIN_PREFIX + '/account/edit').replace(/\/{2}/g, "/"),
            name: 'account-edit',
            component: AccountEdit,
            meta: {
                middleware: auth,
                title: "Edit profile"
            },
        },
        {
            path: ('/' + process.env.MIX_ADMIN_PREFIX + '/admin-users').replace(/\/{2}/g, "/"),
            name: 'admin-users',
            component: AdminUsersList,
            meta: {
                middleware: auth,
                title: "Admin users list"
            }
        },
        {
            path: ('/' + process.env.MIX_ADMIN_PREFIX + '/admin-users/create').replace(/\/{2}/g, "/"),
            name: 'admin-users-create',
            component: AdminUsersCreate,
            meta: {
                middleware: auth,
                title: "Create new admin"
            }
        },
        {
            path: ('/' + process.env.MIX_ADMIN_PREFIX + '/admin-users/edit/:id').replace(/\/{2}/g, "/"),
            name: 'admin-users-edit',
            component: AdminUsersEdit,
            meta: {
                middleware: auth,
                title: "Update the admin"
            }
        },
        {
            path: ('/' + process.env.MIX_ADMIN_PREFIX + '/fields').replace(/\/{2}/g, "/"),
            name: 'field-list',
            component: FieldList,
            meta: {
                middleware: auth,
                title: "Field list"
            }
        },
        {
            path: ('/' + process.env.MIX_ADMIN_PREFIX + '/fields/create').replace(/\/{2}/g, "/"),
            name: 'field-create',
            component: FieldCreate,
            meta: {
                middleware: auth,
                title: "Create field"
            }
        },
        {
            path: ('/' + process.env.MIX_ADMIN_PREFIX + '/fields/:id/edit').replace(/\/{2}/g, "/"),
            name: 'field-edit',
            component: FieldEdit,
            meta: {
                middleware: auth,
                title: "Edit field"
            }
        },
        {
            path: ('/' + process.env.MIX_ADMIN_PREFIX + '/fields/:fieldId/values').replace(/\/{2}/g, "/"),
            name: 'field-value-list',
            component: FieldValueList,
            meta: {
                middleware: auth,
                title: "Field values"
            }
        },
        {
            path: ('/' + process.env.MIX_ADMIN_PREFIX + '/fields/:fieldId/values/create').replace(/\/{2}/g, "/"),
            name: 'field-value-create',
            component: FieldValueCreate,
            meta: {
                middleware: auth,
                title: "Create field value"
            }
        },
        {
            path: ('/' + process.env.MIX_ADMIN_PREFIX + '/fields/:fieldId/values/:fieldValueId').replace(/\/{2}/g, "/"),
            name: 'field-value-edit',
            component: FieldValueEdit,
            meta: {
                middleware: auth,
                title: "Edit field value"
            }
        },
        {
            path: ('/' + process.env.MIX_ADMIN_PREFIX + '/posts/:postType').replace(/\/{2}/g, "/"),
            name: 'post-list',
            component: PostList,
            meta: {
                middleware: auth,
                title: "List of the posts"
            }
        },
        {
            path: ('/' + process.env.MIX_ADMIN_PREFIX + '/posts/:postType/create').replace(/\/{2}/g, "/"),
            name: 'post-create',
            component: PostCreate,
            meta: {
                middleware: auth,
                title: "Create the post"
            }
        },
        {
            path: ('/' + process.env.MIX_ADMIN_PREFIX + '/posts/:postType/:postId/edit').replace(/\/{2}/g, "/"),
            name: 'post-edit',
            component: PostEdit,
            meta: {
                middleware: auth,
                title: "Edit the post"
            }
        },
        {
            path: ('/' + process.env.MIX_ADMIN_PREFIX + '/pages').replace(/\/{2}/g, "/"),
            name: 'pages',
            component: PageList,
            meta: {
                middleware: auth,
                title: "Pages"
            }
        },
        {
            path: ('/' + process.env.MIX_ADMIN_PREFIX + '/pages/create').replace(/\/{2}/g, "/"),
            name: 'page-create',
            component: PageCreate,
            meta: {
                middleware: auth,
                title: "Create new page"
            }
        },
        {
            path: ('/' + process.env.MIX_ADMIN_PREFIX + '/pages/:pageType/:pageId/edit').replace(/\/{2}/g, "/"),
            name: 'page-edit',
            component: PageEdit,
            meta: {
                middleware: auth,
                title: "Edit page"
            }
        },
        {
            path: ('/' + process.env.MIX_ADMIN_PREFIX + '/settings').replace(/\/{2}/g, "/"),
            name: 'settings-list',
            component: SettingsList,
            meta: {
                middleware: auth,
                title: "Settings"
            }
        },
        {
            path: ('/' + process.env.MIX_ADMIN_PREFIX + '/settings/:settingsId').replace(/\/{2}/g, "/"),
            name: 'settings-edit',
            component: SettingsEdit,
            meta: {
                middleware: auth,
                title: "Edit settings"
            }
        },
        {
            path: ('/' + process.env.MIX_ADMIN_PREFIX + '/redirects').replace(/\/{2}/g, "/"),
            name: 'redirect-list',
            component: RedirectList,
            meta: {
                middleware: auth,
                title: "Redirects list"
            }
        },
        {
            path: ('/' + process.env.MIX_ADMIN_PREFIX + '/redirect/create').replace(/\/{2}/g, "/"),
            name: 'redirect-create',
            component: RedirectCreate,
            meta: {
                middleware: auth,
                title: "Create redirect"
            }
        },
        {
            path: ('/' + process.env.MIX_ADMIN_PREFIX + "/:catchAll(.*)").replace(/\/{2}/g, "/"),
            name: "not-found",
            component: NotFound,
            meta: {
                title: "404 Not found",
                hideNav: true,
            }
        }
    ]
});

// Creates a `nextMiddleware()` function which not only
// runs the default `next()` callback but also triggers
// the subsequent Middleware function.
function nextFactory(context, middleware, index) {
    const subsequentMiddleware = middleware[index];
    // If no subsequent Middleware exists,
    // the default `next()` callback is returned.
    if (!subsequentMiddleware) return context.next;

    return (...parameters) => {
        // Run the default Vue Router `next()` callback first.
        context.next(...parameters);
        // Then run the subsequent Middleware with a new
        // `nextMiddleware()` callback.
        const nextMiddleware = nextFactory(context, middleware, index + 1);
        subsequentMiddleware({...context, next: nextMiddleware});
    };
}

router.beforeEach((to, from, next) => {
    if (to.meta.middleware) {
        const middleware = Array.isArray(to.meta.middleware)
            ? to.meta.middleware
            : [to.meta.middleware];

        const context = {
            from,
            next,
            router,
            store,
            to,
        };
        const nextMiddleware = nextFactory(context, middleware, 1);

        return middleware[0]({...context, next: nextMiddleware});
    }

    return next();
});

router.afterEach((to, from) => {
    // Use next tick to handle router history correctly
    // see: https://github.com/vuejs/vue-router/issues/914#issuecomment-384477609
    Vue.nextTick(() => {
        document.title = to.meta.title || process.env.MIX_APP_NAME;
    });
});

export default router;
