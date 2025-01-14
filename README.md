# Blinko Hub

A directory of Blinko sites worldwide. This repository serves as a centralized registry for all Blinko instances.

## API Usage

The API is available at `https://blinko-space.github.io/blinko-hub/`:

### Get all sites
```
GET https://blinko-space.github.io/blinko-hub/
```

### Filter by tag
```
GET https://blinko-space.github.io/blinko-hub/?tag=community
```

### Filter by category
```
GET https://blinko-space.github.io/blinko-hub/?category=official
```

### Search
```
GET https://blinko-space.github.io/blinko-hub/?q=demo
```

You can also use multiple filters:
```
GET https://blinko-space.github.io/blinko-hub/?tag=community&category=official&q=demo
```

## Data Format

`site.yml` format:

```yaml
sites:
  - title: "Site Name"
    url: "https://example.blinko.space"
    description: "Site Description"
    tags: 
      - tag1
      - tag2
    created_at: "2024-01-14"
    category: "Category"
```

## Add Your Site

1. Fork this repository
2. Add your site information to `site.yml`
3. Create a pull request
