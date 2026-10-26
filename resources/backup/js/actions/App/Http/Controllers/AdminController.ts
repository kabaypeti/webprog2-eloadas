import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../../wayfinder'
/**
* @see \App\Http\Controllers\AdminController::adminPage
 * @see app/Http/Controllers/AdminController.php:6
 * @route '/admin'
 */
export const adminPage = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: adminPage.url(options),
    method: 'get',
})

adminPage.definition = {
    methods: ["get","head"],
    url: '/admin',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\AdminController::adminPage
 * @see app/Http/Controllers/AdminController.php:6
 * @route '/admin'
 */
adminPage.url = (options?: RouteQueryOptions) => {
    return adminPage.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\AdminController::adminPage
 * @see app/Http/Controllers/AdminController.php:6
 * @route '/admin'
 */
adminPage.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: adminPage.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\AdminController::adminPage
 * @see app/Http/Controllers/AdminController.php:6
 * @route '/admin'
 */
adminPage.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: adminPage.url(options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\AdminController::adminPage
 * @see app/Http/Controllers/AdminController.php:6
 * @route '/admin'
 */
    const adminPageForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: adminPage.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\AdminController::adminPage
 * @see app/Http/Controllers/AdminController.php:6
 * @route '/admin'
 */
        adminPageForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: adminPage.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\AdminController::adminPage
 * @see app/Http/Controllers/AdminController.php:6
 * @route '/admin'
 */
        adminPageForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: adminPage.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    adminPage.form = adminPageForm
const AdminController = { adminPage }

export default AdminController