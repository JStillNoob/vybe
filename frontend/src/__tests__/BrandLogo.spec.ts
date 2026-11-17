import { describe, it, expect } from 'vitest'
import { mount } from '@vue/test-utils'
import BrandLogo from '../components/common/BrandLogo.vue'

describe('BrandLogo', () => {
  it('renders outlined phone + NFC waves SVG mark and wordmark', () => {
    const wrapper = mount(BrandLogo)

    expect(wrapper.find('svg[aria-hidden="true"]').exists()).toBe(true)
    expect(wrapper.text()).toContain('VY')
    expect(wrapper.text()).toContain('BE')
    expect(wrapper.text()).toContain('Tap. Link. Connect.')
  })
})
