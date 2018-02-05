require "lib/display_length"
helpers DisplayLength

module StringExt
  def ljust(size, padstr = ' ')
    if length == bytesize
      super
    else
      size = size - length
      super(size, padstr)
    end
  end

  def rjust(size, padstr = ' ')
    if length == bytesize
      super
    else
      size = size - length
      super(size, padstr)
    end
  end
end

String.send(:prepend, StringExt)

# set :css_dir, 'stylesheets'
# set :js_dir, 'javascripts'
# set :images_dir, 'images'

# Build-specific configuration
configure :build do
  # For example, change the Compass output style for deployment
  activate :minify_css

  # Minify Javascript on build
  activate :minify_javascript

  # Enable cache buster
  # activate :asset_hash

  # Use relative URLs
  activate :relative_assets

  # Or use a different image path
  # set :http_prefix, "/Content/images/"
end

activate :deploy do |deploy|
  deploy.deploy_method = :git
  deploy.remote = "deploy"
  deploy.branch = "master"
end

activate :livereload
activate :sprockets

set :relative_links, true
#activate :relative_assets

page "2012/*", layout: false
page "2013/*", layout: false
page "2014/*", layout: false
