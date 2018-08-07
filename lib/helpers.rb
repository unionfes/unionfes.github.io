# frozen_string_literal: true

module Helpers
  def latest
    Dir.children(source_directory).select { |d| d =~ /\d{4}/ }.sort.last.to_i
  end

  def years
    2012..latest
  end

  private

  def source_directory
    File.expand_path("../../source", __FILE__)
  end
end
