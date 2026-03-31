import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import { workDir } from './localdir'
const path = require('path')
// https://vite.dev/config/
export default defineConfig({
  base: workDir + "/dist",
  plugins: [vue()],
})
