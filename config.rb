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

configure :build do
  activate :minify_css
  activate :minify_javascript
  activate :relative_assets
end

activate :livereload
activate :sprockets

set :relative_links, true

page "2012/*", layout: false
page "2013/*", layout: false
page "2014/*", layout: false
page "2015/*", layout: false
page "2016/*", layout: false
page "2017/*", layout: false
