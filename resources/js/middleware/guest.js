export default function guest({ next, router }) {
    if (localStorage.hasOwnProperty('admin_authorization_token')) {
        return router.push({ name: 'dashboard' });
    }

    return next();
}
