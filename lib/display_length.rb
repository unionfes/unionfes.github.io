module DisplayLength
  def length(str)
    if str.length == str.bytesize
      str.length
    else
      str.length * 2
    end
  end
end
