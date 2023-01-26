import create_config from '@kucrut/vite-for-wp';


export default create_config(
    {
        theme: 'src/theme.js',
        login: 'src/login.js',
    },
    'build',
    {
        plugins: [
        ],
    }

);