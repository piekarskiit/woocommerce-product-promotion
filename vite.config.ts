import {defineConfig} from 'vite'
import vue from '@vitejs/plugin-vue'

// https://vitejs.dev/config/
export default defineConfig({
	publicDir: 'public/',
	build: {
		assetsDir: '',
		outDir: 'public/assets/',
		emptyOutDir: true,
		manifest: true,
		rollupOptions: {
			input: {
				frontend: 'resources/js/Frontend/main.js',
				backend: 'resources/js/Backend/main.js',
				backendStyle: 'resources/scss/Backend/backend.scss',
				frontendStyle: 'resources/scss/Frontend/frontend.scss',
			},
			output: {
				entryFileNames: `js/[name].js`,
				chunkFileNames: `js/[name].js`,
				assetFileNames: `css/[name].css`,
			}
		},
	},
	plugins: [
		vue({}),
	],
})
