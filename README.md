# Blinko Hub

A directory of Blinko sites worldwide. This repository serves as a centralized registry for all Blinko instances.

## Data Format

`site.yml` format:

```yaml
sites:
  - title: "Site Name"
    url: "https://example.blinko.space"
    image: "https://example.blinko.space/api/file/Square310x310Logo_1736658229667.png"
    tags: 
      - english
      - blog
    created_at: "2024-01-14"
```

## Add Your Site

1. Fork this repository
2. Get your site logo from 'https://your-site-url/api/v1/public/site-info'
2. Add your site information to `site.yml`
3. Create a pull request
