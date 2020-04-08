def train_test_split(train, label, train_size=None, test_size=None, shuffle=True):
        assert len(train) == len(label)
        if train_size is not None and test_size is not None:
            assert train_size + test_size <= 1
        elif train_size is not None:
            test_size = 1 - train_size
        else:
            train_size = 1 - test_size

        N = len(train)
        train_size = int(train_size * N)
        test_size = int(test_size * N)
        indices = np.arange(N)
        if shuffle:
            np.random.shuffle(indices)
        train_idx, test_idx = indices[:train_size], indices[train_size:train_size+test_size]
        return train[train_idx], train[test_idx], label[train_idx], label[test_idx]