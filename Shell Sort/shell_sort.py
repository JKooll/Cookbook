def shell_sort(data):
  N = len(data)
  h = 1
  while h < N / 3:
    h = h * 3 + 1
  while h >= 1:
    for i in range(h, N):
      for j in (i, h - 1, -h):
        if a[j] >= a[j - h]:
          break
        temp = a[j]
        a[j] = a[j - h]
        a[j - h] = temp