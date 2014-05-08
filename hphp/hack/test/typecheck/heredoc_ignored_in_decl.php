<?hh // decl
/**
 * Copyright (c) 2014, Facebook, Inc.
 * All rights reserved.
 *
 * This source code is licensed under the BSD-style license found in the
 * LICENSE file in the "hack" directory of this source tree. An additional grant
 * of patent rights can be found in the PATENTS file in the same directory.
 *
 */

class Test {
  public function test() {
    return <<<END
      public function testFunctionWithReturnTypeHavingAngleBrackets(): array<int> {
        return array();
      }
END;
  }
}
