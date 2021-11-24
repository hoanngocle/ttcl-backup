export default [
  {
    header: 'management',
  },
  {
    title: 'User',
    route: 'users',
    icon: 'UserIcon',
  },
  {
    title: 'Course',
    route: 'courses',
    icon: 'MessageSquareIcon',
  },
  {
    title: 'Term',
    route: 'apps-todo',
    icon: 'CheckSquareIcon',
  },
  {
    title: 'eCommerce',
    icon: 'ShoppingCartIcon',
    children: [
      {
        title: 'Shop',
        route: 'apps-e-commerce-shop',
      },
      {
        title: 'Details',
        route: { name: 'apps-e-commerce-product-details', params: { slug: 'apple-watch-series-5-27' } },
      },
      {
        title: 'Wishlist',
        route: 'apps-e-commerce-wishlist',
      },
      {
        title: 'Checkout',
        route: 'apps-e-commerce-checkout',
      },
    ],
  },
];
