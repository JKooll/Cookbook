class MaxPQ:
  pq = []
  N = 0

  def __init__(self, maxN):
    self.pq = [None] * (maxN + 1)

  def isEmpty(self):
    return self.N == 0
  
  def size(self):
    return self.N
  
  def insert(self, v):
    self.N += 1
    self.pq[self.N] = v
    self.swim(self.N)

  def delMax(self):
    max_key = self.pq[1] 
    self.exch(1, N)
    self.N -= 1
    self.pq[self.N + 1] = None
    self.sink(1)
    return max_key
  
  def less(self, i, j):
    return self.pd[i] < self.pd[j]

  def exch(self, i, j):
    temp = self.pd[i]
    self.pd[i] = self.pd[j]
    self.pd[j] = temp

  def swim(self, k):
    while k > 1 and self.less(k / 2, k):
      self.exch(k / 2, k)
      k /= 2

  def sink(self, k):
    while 2 * k <= self.N:
      j = 2 * k
      if j < self.N and self.less(j, j + 1):
        j += 1
      if not self.less(k, j):
        break
      self.exch(k, j)
      k = j