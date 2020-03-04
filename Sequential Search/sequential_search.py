class SequentialSearchST():
  first = None
  
  class Node():
    def __init__(self, key, val, next):
      self.key = key
      self.val = val
      self.next = next

  def get(self, key):
    x = self.first
    while x is not None:
      if key == x.key:
        return x.val
      x = x.next
    return None
  
  def put(self, key, val):
    x = self.first
    while x is not None:
      if key == x.key:
        x.val = val
        return
    self.first = Node(key, val, self.first)
