import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
const path = require('path')
// https://vite.dev/config/
export default defineConfig({
  base: "/home/maxime/cesi/projet4_solo/frontend/dist",
  plugins: [vue()],
})
