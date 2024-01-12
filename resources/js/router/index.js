import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory('/'),
  routes: [
      {
          path: '/',
          name: 'main',
          component: () => import('../views/product/Main.vue')
      },
    {
      path: '/products',
      name: 'product.index',
      component: () => import('../views/product/Index.vue')
    },
    {
      path: '/products/:id',
      name: 'product.show',
      component: () => import('../views/product/Show.vue')
    },
    {
      path: '/products/cart',
      name: 'product.cart',
      component: () => import('../views/product/Cart.vue')
    }
  ]
})

export default router
