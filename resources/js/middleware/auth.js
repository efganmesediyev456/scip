export default async function auth({ next, router, store }) {
    if (!localStorage.hasOwnProperty('admin_authorization_token')) {
        return router.push({ name: 'login' });
    }

    await store.dispatch('admin/getUser')

    return next();
}
